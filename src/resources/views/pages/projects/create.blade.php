<x-app-layout>
    @push('scripts')
        <script>
            $( function() {
                {{--var availableTags = JSON.parse("{{ json_encode($donors) }}");--}}
                const donors = {!! json_encode($donors) !!};
                var donorNames=[];
                for (let x in donors)
                    donorNames.push(donors[x].name)

                // console.log("tags", donorNames)
                $( "#donors" ).autocomplete({
                    source: donorNames
                });
            } );
        </script>
    @endpush
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <x-navigation></x-navigation>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <livewire:new-project />
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
