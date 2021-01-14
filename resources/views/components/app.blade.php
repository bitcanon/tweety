<x-master>
    <div class="row">
        <!-- Main Content -->
        <div class="col-xl-1"></div>

        <div class="col-md-8 col-xl-7">
            {{ $slot }}
        </div>

        <!-- Following List (right)-->
        <div class="col-md-4 col-xl-3">
            <x-tweets.following-list/>
        </div>

        <div class="col-xl-1"></div>
    </div>
</x-master>
