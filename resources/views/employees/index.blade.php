<?php
@extends('layouts.app')
@section('content')
    <h3>My Example Home Employees</h3>
    <div>
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <!-- Name Employees -->
            <div>
                <label for="name">
                    Full Name
                    <span class="text-red-500">*</span>
                </label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    placeholder="Иван Иванов"
                >
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </form>
    </div>
@endsection
