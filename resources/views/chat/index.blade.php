@extends('layouts.admin-panel')

@push('css')
    <style>
        .chatbox-list {
            height: 75vh;
            overflow-y: scroll;
            display: flex;
            flex-direction: column-reverse;
        }

        .clientbox {
            overflow-y: scroll;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            width: 5px;
            background: #f5f5f5;
        }

        ::-webkit-scrollbar-thumb {
            width: 1em;
            background-color: #ddd;
            outline: 1px solid slategrey;
            border-radius: 1rem;
        }

        .text-small {
            font-size: 0.9rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #999;
        }
    </style>
@endpush
