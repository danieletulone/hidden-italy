@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <x-dashboard-counter 
                        name="categories" 
                        :count="$counts['categories']" 
                        icon="group_work" 
                    />

                    <x-dashboard-counter 
                        name="monuments" 
                        :count="$counts['monuments']" 
                        icon="account_balance" 
                    />

                    <x-dashboard-counter 
                        name="users" 
                        :count="$counts['users']" 
                        icon="account_circle" 
                    />
                </div>
            </div>

            <div class="col-12 p-3">

                <div class="p-4 shadow">
                    <date-filter-chart></date-filter-chart>
                </div>
            </div>
        </div>
    </x-container>
@endsection