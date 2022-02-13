
@extends('app')

@section('title', 'Location List')

@section('content')
    @if (!empty($errors))
    <div class="p-2 w-auto bg-red-50 rounded-lg border-2 border-rose-600 ">
        Errors:
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (isset($locations) && count($locations) > 0)
        <table class="my-5 w-full table-auto border-collapse border border-slate-400 ">
            <thead class="">
                <tr>
                    <th class="border border-slate-300">Office Name</td>
                    <th class="border border-slate-300">Pincode</th>
                    <th class="border border-slate-300">Office Type</th>
                    <th class="border border-slate-300">Delivery Status</th>
                    <th class="border border-slate-300">Division</th>
                    <th class="border border-slate-300">Region</th>
                    <th class="border border-slate-300">Circle</th>
                    <th class="border border-slate-300">Taluk</th>
                    <th class="border border-slate-300">District</th>
                    <th class="border border-slate-300">State</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $office)
                    <tr>
                        <td class="border border-slate-300">{{ $office->office }}</td>
                        <td class="border border-slate-300">{{ $office->pincode }}</td>
                        <td class="border border-slate-300">{{ $office->office_type }}</td>
                        <td class="border border-slate-300">{{ $office->delivery_status }}</td>
                        <td class="border border-slate-300">{{ $office->division }}</td>
                        <td class="border border-slate-300">{{ $office->region }}</td>
                        <td class="border border-slate-300">{{ $office->circle }}</td>
                        <td class="border border-slate-300">{{ $office->taluk }}</td>
                        <td class="border border-slate-300">{{ $office->district }}</td>
                        <td class="border border-slate-300">{{ $office->state }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center navigation">
            {{ $locations->links() }}
        </div>
    @else
        <div class="text-center alert danger">No records found!</div>
    @endif

  @endsection
