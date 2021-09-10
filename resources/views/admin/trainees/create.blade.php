<x-dashboard-layout title="Create New Trainee">

    <form action="{{ route('admin.trainees.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.trainees._form',[
       
        ])
    </form>
    </x-dashboard-layout>