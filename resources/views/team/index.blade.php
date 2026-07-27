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
                    <tbody>
                        <tr>
                            <td class="col-id">#01</td>
                            <td>
                                <div class="member-profile">
                                    <div class="avatar-glow">K</div>
                                    <div class="member-details">
                                        <span class="member-name">Karim Muhammed</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-position">Member</span></td>
                            <td><span class="community-tag">Web Development</span></td>
                            <td><span class="badge badge-track">Front-End</span></td>
                            <td>
                                <a href="mailto:karim@sitfit.com" class="email-link">
                                    karim@sitfit.com
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection