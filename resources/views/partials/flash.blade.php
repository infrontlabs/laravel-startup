@if(session('success'))
                <div class="alert alert-success" role="alert">
                    {!! session('success') !!}

                    @if (session('emailChanged'))
                        <div><strong>{!! session('emailChanged') !!}</strong></div>
                    @endif
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    {!! session('error') !!}
                </div>
                @endif

                @if(session('info'))
                <div class="alert alert-info" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    {!! session('info') !!}
                </div>
                @endif

                @if(session('warning'))
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    {!! session('warning') !!}
                </div>
                @endif

