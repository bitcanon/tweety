<x-app>
    {{-- Form to write and publish a new tweet --}}
    <x-tweets.publish-panel/>

    {{-- List the tweets in the collection --}}
    <ul class="list-group shadow-sm mb-4">
        @foreach ($tweets as $tweet)
            <x-tweets.single-tweet :tweet="$tweet"/>
        @endforeach
    </ul>
</x-app>
