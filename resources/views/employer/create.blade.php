@extends('index')
@section('content')
    <div class="col-lg-12">
        <div class="container login-container">
            <div class="top-googooli-container">
                <img class="ball ball_one" src="{{asset('assets/photo/blur_ball_one.png')}}">
                <img class="ball ball_two" src="{{asset('assets/photo/blur_ball_two.png')}}">
                <img class="ball ball_three" src="{{asset('assets/photo/blur_ball_three.png')}}">
                <img class="line lineanim" src="{{asset('assets/icon/lines.svg')}}">
            </div>
            <div class="row ">

                <div class="col-lg-12">
                    <div class="row  form-box inner-container">
                        <div class="col-lg-12 ">
                            <h1 id="title" class="title">
                                Create
                            </h1>
                        </div>
                        <div class="col-lg-12">
                            <div class="item">
                                <form method="post" action="{{ route('employer_create') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row ">
                                                <label>
                                                    Job title
                                                </label>
                                                <input type="text" placeholder="Job title " name="title"
                                                       value="{{ old('title') }}">
                                                <img src="{{asset('assets/icon/details.svg')}}">
                                            </div>
                                            @error('title')
                                            <span style="color: red">
                                                {{ $message }}
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>
                                                    Position Job
                                                </label>
                                                <div id="Position-Job" class="dropdown">
                                                    <div class="select">
                                                        <span> Position Job</span>
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden">
                                                    <ul class="dropdown-menu">

                                                    </ul>
                                                </div>
                                                <div id="Position-tag-row" class="tag-row">
                                                    @foreach(old('Positions') ?? [] as $old_position)
                                                        <div class="tag-item"><img
                                                                src="{{ asset('assets/icon/cancel.svg') }}">{{ \App\Models\Position::query()->find($old_position)->name }}
                                                        </div>
                                                        <input name="Positions[]" value="{{ $old_position }}" hidden/>
                                                    @endforeach
                                                </div>
                                                @error('Positions')
                                                <span style="color: red">
                                                {{ $message }}
                                                </span>
                                                @enderror

                                            </div>

                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>
                                                    Benefits
                                                </label>
                                                <div id="Benefits" class="dropdown">
                                                    <div class="select">
                                                        <span> Benefits </span>
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>


                                                    <input type="hidden">
                                                    <ul class="dropdown-menu">

                                                    </ul>
                                                </div>
                                                <div id="Benefits-tag-row" class="tag-row">
                                                    @foreach(old('Benefits') ?? [] as $old_benefit)
                                                        <div class="tag-item"><img
                                                                src="{{ asset('assets/icon/cancel.svg') }}">{{ \App\Models\Benefits::query()->find($old_benefit)->name }}
                                                        </div>
                                                        <input name="Benefits[]" value="{{ $old_benefit }}" hidden/>
                                                    @endforeach
                                                </div>
                                                @error('Benefits')
                                                <span style="color: red">
                                                {{ $message }}
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>
                                                    Type
                                                </label>
                                                <div id="Type" class="dropdown">
                                                    <div class="select">
                                                        <span> Type </span>
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden">
                                                    <ul class="dropdown-menu">

                                                    </ul>
                                                </div>
                                                <div id="Type-tag-row" class="tag-row">
                                                    @foreach(old('types') ?? [] as $old_types)
                                                        <div class="tag-item"><img
                                                                src="{{ asset('assets/icon/cancel.svg') }}">{{ \App\Models\Type::query()->find($old_types)->name }}
                                                        </div>
                                                        <input name="types[]" value="{{ $old_types }}" hidden/>
                                                    @endforeach
                                                </div>
                                                @error('types')
                                                <span style="color: red">
                                                {{ $message }}
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>
                                                    Category
                                                </label>
                                                <div id="category" class="dropdown">
                                                    <div class="select">
                                                        <span> Category </span>
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden">
                                                    <ul class="dropdown-menu">

                                                    </ul>
                                                </div>
                                                <div id="category-tag-row" class="tag-row">
                                                    @foreach(old('categories') ?? [] as $old_cat)
                                                        <div class="tag-item"><img
                                                                src="{{ asset('assets/icon/cancel.svg') }}">{{ \App\Models\Category::query()->find($old_cat)->name }}
                                                        </div>
                                                        <input name="categories[]" value="{{ $old_cat }}" hidden/>
                                                    @endforeach
                                                </div>
                                                @error('categories')
                                                <span style="color: red">
                                                {{ $message }}
                                                </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Level
                                                </label>
                                                <div class="dropdown">
                                                    <div class="select">
                                                        @if(old('level'))
                                                            <span>{{ config('Constants.LEVELS')[old('level')] }}</span>
                                                        @else
                                                            <span>Level</span>
                                                        @endif
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="input_of_level" name="level"
                                                           value="{{ old('level') }}">
                                                    <ul class="dropdown-menu">
                                                        @foreach(config('Constants.LEVELS') as $key => $level)
                                                            @if($key == 0)
                                                                @continue
                                                            @endif
                                                            <li onclick="set_level_to_input({{ $key }})">{{ $level }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                <script>
                                                    function set_level_to_input(id) {
                                                        document.getElementById('input_of_level').value = id;
                                                    }
                                                </script>

                                                @error('level')
                                                <span style="color: red">
                                                {{ $message }}
                                            </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="space margin-bottom col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label class="padding-item">Salary Range</label>
                                            <div class="row">
                                                <div class="padding-item col-lg-3 col-md-4 col-sm-4 col-6">
                                                    <div class="margin-top input-row">
                                                        <input type="text" placeholder="From " name="salary_from"
                                                               value="{{ old('salary_from') }}">
                                                        <img src="{{asset('assets/icon/dollor.svg')}}">
                                                    </div>
                                                    @error('salary_from')
                                                    <span style="color: red">
                                                          {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="padding-item col-lg-3 col-md-4 col-sm-4 col-6">
                                                    <div class="margin-top input-row">
                                                        <input type="text" placeholder="To " name="salary_to"
                                                               value="{{ old('salary_to') }}">
                                                        <img src="{{asset('assets/icon/dollor.svg')}}">
                                                    </div>
                                                    @error('salary_to')
                                                    <span style="color: red">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" id="salary_id" name="salary_id"
                                                   value="{{ old("salary_id") ?? (config('Constants.SALARY_PERIOD'))[0] }}"/>
                                            <div class="date-details-row padding-item margin-top">
                                                @foreach(config('Constants.SALARY_PERIOD') as $key => $salary)
                                                    <a class="first-choose date-details @if(old("salary_id")) @if(old("salary_id") === $salary) active @endif @elseif($loop->index == 0) active @endif"
                                                       onclick="$('#salary_id').val('{{ $salary }}'); return false;">
                                                        {{ $salary }}
                                                    </a>
                                                @endforeach
                                            </div>


                                        </div>
                                        <div class="space margin-bottom col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="flex-box checkbox-row padding-item">
                                                <label>
                                                    Pay in Crypto
                                                </label>
                                                <input type="checkbox" class="checkbox" name="crypto" @if(old('crypto')) checked @endif>

                                            </div>
                                        </div>


                                        <div class="space col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label class="padding-item">Skills</label>
                                            <div class="row">
                                                <div class="padding-item col-lg-6 col-md-7 col-sm-6 col-12">
                                                    <form class="form">
                                                        <div class="margin-top input-row">
                                                            <input id="todo" type="text" placeholder="Skills">
                                                            <img src="{{asset('assets/icon/skills.svg')}}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="padding-item col-lg-2 col-md-3 col-sm-3 col-12">
                                                    <div class="margin-top input-row">
                                                        <a class="margin-top black-btn remove-btn">
                                                            ADD
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="skills-row" class="padding-item tag-row">
                                                @foreach(old('skills') ?? [] as $old_skil)
                                                    <a class="date-details">{{ $old_skil }}</a>
                                                    <input type="hidden" name="skills[]" value="{{ $old_skil }}">
                                                @endforeach
                                            </div>


                                        </div>
                                        @error('skills')
                                        <span style="color: red">
                                                {{ $message }}
                                                </span>
                                        @enderror

                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    About Job
                                                </label>
                                                <textarea placeholder="About Job"
                                                          name="about">{{ old('about') }}</textarea>
                                                <img class="textarea-img" src="{{asset('assets/icon/details.svg')}}">
                                            </div>
                                            @error('about')
                                            <span style="color: red">
                                                {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="padding-item col-lg-12">
                                            <button class="apply-btn">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

@section('optional_footer')

    <script>
        let Benefits_filter_items = Array(
            @foreach($benefits as $benefit)
                @if(array_search($benefit->id , old('Benefits') ?? []) !== false)
                @continue
                @endif
                "{{ $benefit->name }}",
            @endforeach
        );
        let Benefits_filter_items_id = Array(
            @foreach($benefits as $benefit)
                @if(array_search($benefit->id , old('Benefits') ?? []) !== false)
                @continue
                @endif
                "{{ $benefit->id }}",
            @endforeach
        );
        let filter_items = Array(
            @foreach($positions as $position)
                @if(array_search($position->id , old('Positions') ?? []) !== false)
                @continue
                @endif
                "{{ $position->name }}",
            @endforeach
        );
        let filter_items_id = Array(
            @foreach($positions as $position)
                @if(array_search($position->id , old('Positions') ?? []) !== false)
                @continue
                @endif
                "{{ $position->id }}",
            @endforeach
        );

        let type_filter_items = Array(
            @foreach($types as $type)
                @if(array_search($type->id , old('types') ?? []) !== false)
                @continue
                @endif
                "{{ $type->name }}",
            @endforeach
        );

        let type_filter_items_id = Array(
            @foreach($types as $type)
                @if(array_search($type->id , old('types') ?? []) !== false)
                @continue
                @endif
                "{{ $type->id }}",
            @endforeach
        );

        let category_filter_items = Array(
            @foreach($categories as $category)
                @if(array_search($category->id , old('categories') ?? []) !== false)
                @continue
                @endif
                "{{ $category->name }}",
            @endforeach
        );
        let category_filter_items_id = Array(
            @foreach($categories as $category)
                @if(array_search($category->id , old('categories') ?? []) !== false)
                @continue
                @endif
                "{{ $category->id }}",
            @endforeach
        );

        let level_filter_items = Array(
            @foreach(config('Constants.LEVELS') as $key => $level)
                @if($key == 0)
                @continue
                @endif
                "{{ $level }}",
            @endforeach
        );
        let level_filter_items_id = Array(
            @foreach(config('Constants.LEVELS') as $key => $level)
                @if($key == 0)
                @continue
                @endif
                "{{ $key }}",
            @endforeach
        );
    </script>


    <script>
        $(".register-row input").blur(function () {
            var inputVal = $(this).val();
            if (inputVal == '') {
                $(this).parent().addClass("active")
                $(this).addClass("active")
            } else {
                $(this).parent().removeClass("active")
                $(this).removeClass("active")

            }
        });
        const btn = document.querySelector('.black-btn');
        const inpt = document.querySelector('#todo');
        const ul = document.querySelector('#skills-row');

        //const deleteLi = document.querySelector('.remove');

        btn.addEventListener('click', liGenerate);

        // document.addEventListener('click', liDelete);

        function liGenerate(e) {
            const a = document.createElement('input');
            const li = document.createElement('a');

            if (inpt.value !== "") {
                a.type = 'hidden';
                a.name = "skills[]";
                a.value = inpt.value;

                li.className = "date-details";
                //const liContent = document.createTextNode(`${inpt.value}`);
                li.innerHTML = `${inpt.value}`;

                //li.appendChild(liContent);
                ul.appendChild(li);
                ul.appendChild(a);

                inpt.value = "";
            }
            e.preventDefault();
        }

    </script>
@endsection
