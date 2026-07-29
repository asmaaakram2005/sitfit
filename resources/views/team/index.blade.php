@extends('layouts.app')

@section('title', 'Team')




@section('content')
<link rel="stylesheet" href="{{ asset('css/team.css') }}">

<div class="team-page">
    <div class="glow-backdrop"></div>
    
    <div class="container">
        <div class="team-header">
            <span class="header-badge">Core Operations</span>
            <h1 class="header-title">Team Directory</h1>
            <p class="header-subtitle">Overview of active contributors and management members.</p>
        </div>

        <div class="table-card">
            <div class="table-wrapper">
                <table class="team-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Community</th>
                            <th>Track</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    @foreach($teamMembers as $teamMember)
                        <tbody>
                            <tr>
                                <td class="col-id">{{$teamMember->id}}</td>
                                <td>
                                    <div class="member-profile">
                                        <div class="avatar-glow">{{ $teamMember->first_letter }}</div>
                                        <div class="member-details">
                                            <span class="member-name">{{$teamMember->name}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-position">{{$teamMember->position}}</span></td>
                                <td><span class="community-tag">{{$teamMember->community}}</span></td>
                                <td><span class="badge badge-track">{{$teamMember->track}}</span></td>
                                <td>
                                    <a href="mailto:karim@sitfit.com" class="email-link">
                                        {{$teamMember->email}}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection