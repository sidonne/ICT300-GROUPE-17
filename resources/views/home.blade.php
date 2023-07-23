@extends('layouts.frontend.app')

@section('main_content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/frontend/css/main.css">
</head>
<body>
    <header>
        <div class="logo-wrapper">
            <div class="logo_wiki sprite svg-wiki">
                WikiCulTurE
        </div>
        <img src="/img/Wiki.png" class="logo" alt="WikiCulTurE" width="210" height="135">
        <p>The Free Encyclopedia</p>
    </header>
    <main>
        <div class="container-central">
            <div class="central-lang box-1" >
                <a href="" >
                    <strong>Extreme North</strong>

                </a>
            </div>
            <div class="central-lang box-2">
                <a href="" class="central-featured-lang">
                    <strong>North</strong>

                </a>
            </div>
            <div class="central-lang box-3">
                <a href="" class="central-featured-lang">
                    <strong>Adamawa</strong>

                </a>
            </div>
            <div class="central-lang box-4">
                <a href="" class="central-featured-lang">
                    <strong>East</strong>

                </a>
            </div>
            <div class="central-lang box-5">
                <a href="" class="central-featured-lang">
                    <strong>West</strong>

                </a>
            </div>
            <div class="central-lang box-6">
                <a href="" class="central-featured-lang">
                    <strong>Center</strong>

                </a>
            </div>
            <div class="central-lang box-7">
                <a href="" class="central-featured-lang">
                    <strong>North-West</strong>

                </a>
            </div>

            <div class="central-lang box-8">
                <a href="" class="central-featured-lang">
                    <strong>South-West</strong>

                </a>
            </div>
            <div class="central-lang box-9">
                <a href="" class="central-featured-lang">
                    <strong>Littoral</strong>

                </a>
            </div>
            <div class="central-lang box-10">
                <a href="" class="central-featured-lang">
                    <strong>South</strong>

                </a>
            </div>
        </div>
    </main>

    <section class="search">
        <form action="{{ route('search') }}" method="GET">
            <div class="box-search">
                <div class="search-input">
                    <input type="text" placeholder="Search here..." name="query" class="form-control  typeahead" value="{{ isset($query) ? $query : '' }}">
                </div>
                <!-- <div class="search-language">
                    <select name="" id="">
                        <option value="ES">ES</option>
                    </select>
                </div> -->
            </div>
            <button class="btn-search btn btn-dark"  type="submit">
                <i class="fas fa-search">Search</i>
            </button>
        </form>
    </section>

    <!-- <section class="translate">
        <div class="line-decoration"><hr></div>
        <button>
            <i class="sprite translate-icon"></i>
            <span>Read Wikipedia in your language</span>
            <i class="sprite icon-arrow-down-blue"></i>
        </button>
    </section> -->
    <div class="line-section"><hr>
        @if(count($posts)>0)

        @else
        <p class="alert alert-danger">No Article Found</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
    url = "{{route('search')}}";
    $ ('input.typeahead').typeahead({
        source:function(value,process){
            return $.get(url, {value:value}, function(data){
                return process(data);
            });
        }
    });
</script>

@endsection
