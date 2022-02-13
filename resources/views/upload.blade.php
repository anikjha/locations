

@extends('app')

@section('title', 'Upload Location File')

@section('content')

@if (isset($errors) && count($errors) > 0)
<div class="p-2 w-auto bg-red-50 rounded-lg border-2 border-rose-600 ">
    Unable to process file, due to below errors.
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (isset($message))
<div class="p-2 w-auto bg-emerald-50 rounded-lg border-2 border-emerald-400 ">
    {{$message}}
</div>
@endif

<form class="mt-5  flex items-center space-x-6" action="/upload" method="POST" enctype="multipart/form-data">
    <div class="flex">

        <input type="file" name="file" class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-green-50 file:text-green-700
        hover:file:bg-green-100">

        <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Upload</button>

    </div>
</form>
@endsection
