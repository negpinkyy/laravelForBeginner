
<x-layout>
    <x-slot:heading>
Jobs
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job )

         <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border rounded">

            <div class="bold text-blue-900">{{$job->employer->name}}</div>
            <strong>{{ $job['title'] }}</strong> Salary:{{$job['salary']}}    </a>


        @endforeach
        <div class="pb-20">{{$jobs->links()}}</div>
    </div>

</x-layout>
