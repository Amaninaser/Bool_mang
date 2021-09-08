<x-dashboard-layout title="Create New Trainer">
<x-alert />

    <form action="{{ route('admin.trainers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.trainers._form',[
        'button_lable' => 'إضافة'
        ])

    </form>
</x-dashboard-layout>