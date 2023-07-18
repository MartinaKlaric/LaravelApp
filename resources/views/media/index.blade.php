<x-app-layout>
    <div class="container flex justify-center my-background">
        <div class="mt-16">
            <h1>{{ $title }}</h1>

            @isset($data)
                @forelse ($data as $media)
                    <p>{{ $media }}</p>
                @empty
                    <p>No data!</p>
                @endforelse
            @endisset

            @php
                $i = 0;
            @endphp

            @for(; $i < 10; $i++)
                <p>Current value is {{ $i }}</p>
            @endfor

            @while($randValue = rand(1, 10) > 5)
                <p>Still going! Random value was {{ $randValue }}</p>
            @endwhile

            <p>Random value is @random</p>

            <!-- Comment -->
            {{-- Blade comment --}}

            {{ date('Y-m-d', time()) }}
        </div>
    </div>

</x-app-layout>



