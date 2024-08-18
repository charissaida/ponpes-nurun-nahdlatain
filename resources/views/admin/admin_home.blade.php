@extends('layouts.admin')

    @section('content_admin')
    @parent
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12">
                            <div class="shadow p-3 mb-5 bg-light rounded">
                                <h1 class="display-5">Selamat Datang (Admin {{ Auth::user()->name }})</h1>
                                <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ratione culpa voluptatem fugiat aspernatur quidem libero, nihil maxime vero, temporibus perspiciatis optio aliquam laborum quos nulla illo fugit molestiae iure.</p>
                                <br><br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
    @endsection
