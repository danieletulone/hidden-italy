@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12 col-md-6">
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
        </div>
    </x-container>
@endsection