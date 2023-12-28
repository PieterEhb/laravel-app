@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-header bg-dark text-white">
            About
        </div>
        <div class="card-body bg-secondary text-white">
            <p class="card-text">App created by Pieter De Pauw</p>
            <p class="card-text">resources used to build app</p>
            <ul>
                <li>
                    <p class="card-text">made with laravel: https://laravel.com/</p>
                </li>
                <li>
                    <p class="card-text">Demo Guestbook.</p>
                </li>
                <li>
                    <p class="card-text">Auth by Laravel/ui</p>
                </li>
                <li>
                    <p class="card-text">Change Password: https://magecomp.com/blog/change-password-with-current-password-laravel-8/</p>
                </li>
                <li>
                    <p class="card-text">admin middleware: https://www.appfinz.com/blogs/laravel-middleware-for-auth-admin-users-roles/</p>
                </li>
                <li>
                    <p class="card-text">dropdown menu: https://stackoverflow.com/questions/54029008/need-to-create-a-drop-down-list-in-laravel-and-insert-the-results-in-a-new-data</p>
                </li>
                <li>
                    <p class="card-text">images: https://www.itsolutionstuff.com/post/laravel-10-crud-with-image-upload-tutorialexample.html</p>
                </li>
                <li>
                    <p class="card-text">Bootstrap</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection