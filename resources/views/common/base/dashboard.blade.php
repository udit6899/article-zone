
@push('css')

@endpush

<!-- Base dashboard page -->
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL POSTS</div>
                    <div class="number count-to"
                         data-from="0" data-to="{{ $totalPosts }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">post_add</i>
                </div>
                <div class="content">
                    <div class="text">PENDING POSTS</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $totalPendingPosts }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">comment</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL COMMENTS</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $totalPostComments }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">group_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL VIEWS</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $totalPostViews }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @hasSection('admin-activity')
        @yield('admin-activity')
    @endif

    <!-- #END# Widgets -->
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @hasSection('active-author')
                @yield('active-author')
            @else
                @include('common.base.post.popular-post', ['prefix' => 'author'])
            @endif
        </div>
        <!-- #END# Task Info -->
    </div>
</div>

@push('js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
@endpush
