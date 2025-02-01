<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusTimetable;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BusController extends Controller
{
    public function create()
    {
        return view('bus.create');
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $bus = new Bus;

        $imageUrl = $this->uploadImageToS3($request->file('img'), 'bus_'.$request->input('bus_code').'.jpg');
        $bus->img = $imageUrl;

        abort_if(! $this->busSave($bus, $request), 404);

        $timetableData = json_decode($request->input('departure_day_time_pairs'), true);

        foreach ($timetableData as $pair) {
            BusTimetable::create([
                'bus_id' => $bus->id,
                'day' => $pair['day'],
                'departure_time' => $pair['time'],
            ]);
        }

        return redirect()->route('adminW');
    }

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->load('timetables');

        return view('bus.edit', compact('bus'));
    }

    public function update(Request $request, $id)
    {
        $this->validateUpdate($request);
        $bus = Bus::findOrFail($id);

        if ($request->file('img')) {
            $imageUrl = $this->uploadImageToS3($request->file('img'), 'bus_'.$request->input('bus_code').'.jpg');
            $bus->img = $imageUrl;
        }

        abort_if(! $this->busSave($bus, $request), 404);

        $bus->timetables()->delete();
        $timetableData = json_decode($request->input('departure_day_time_pairs'), true);

        foreach ($timetableData as $pair) {
            BusTimetable::create([
                'bus_id' => $bus->id,
                'day' => $pair['day'],
                'departure_time' => $pair['time'],
            ]);
        }

        Alert::toast('Bus info updated.');

        return redirect()->route('admin.buses');
    }

    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        Alert::toast('Bus deleted!');

        return redirect()->route('admin.buses');
    }

    private function busSave(Bus $bus, $request)
    {

        $bus->name = $request->name;
        $bus->bus_code = $request->bus_code;
        $bus->from = $request->from;
        $bus->to = $request->to;
        $bus->fare = $request->fare;
        $bus->driver_name = $request->driver_name;
        $bus->status = $request->status;
        $bus->seats = $request->seats;

        if ($bus->save()) {
            return true;
        }

        return false;
    }

    private function validateStore($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'bus_code' => 'required|min:3',
            'img' => 'required|image|max:10000',
            'from' => 'required|min:2',
            'to' => 'required|min:2',
            'seats' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
            'fare' => 'required',
            'departure_day_time_pairs' => 'required',
        ]);
    }

    private function validateUpdate($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'bus_code' => 'required|min:3',
            'img' => 'sometimes|image|max:10000',
            'from' => 'required|min:2',
            'to' => 'required|min:2',
            'seats' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
            'fare' => 'required',
        ]);
    }

    protected function uploadImageToS3($file, $file_name)
    {
        $bucketName = $_ENV['AWS_BUCKET'];
        $region = $_ENV['AWS_DEFAULT_REGION'];
        $accessKey = $_ENV['AWS_ACCESS_KEY_ID'];
        $secretKey = $_ENV['AWS_SECRET_ACCESS_KEY'];

        $s3Client = new S3Client([
            'region' => $region,
            'version' => 'latest',
            'credentials' => [
                'key' => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

        $fileName = 'bus_'.$file_name.'.jpg';

        $sourceFilePath = $file->getRealPath();

        $result = $s3Client->putObject([
            'Bucket' => $bucketName,
            'Key' => $fileName,
            'SourceFile' => $sourceFilePath,
        ]);

        return $result['ObjectURL'];
    }
}
