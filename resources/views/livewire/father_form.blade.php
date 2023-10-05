@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <form wire:submit.prevent="submit" method="POST">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Email')}}</label>
                            <input type="email" wire:model="email"  class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Password')}}</label>
                            <input type="password" wire:model="password" class="form-control" >
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                            <input type="text" wire:model="name_father" class="form-control" >
                            @error('name_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                            <input type="text" wire:model="name_father_en" class="form-control" >
                            @error('name_father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                            <input type="text" wire:model="job_father" class="form-control">
                            @error('job_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                            <input type="text" wire:model="job_father_en" class="form-control">
                            @error('job_father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                            <input type="text" wire:model="national_id_father" class="form-control">
                            @error('national_id_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                            <input type="text" wire:model="passport_id_father" class="form-control">
                            @error('passport_id_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                            <input type="text" wire:model="phone_father" class="form-control">
                            @error('phone_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                            <select class="form-select my-1 mr-sm-2" data-control="select2" wire:model="nationality_father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($nationalities as $national)
                                    <option value="{{$national->id}}">{{$national->name}}</option>
                                @endforeach
                            </select>
                            @error('nationality_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                            <select class="form-select my-1 mr-sm-2" wire:model="blood_father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($bloods as $blood)
                                    <option value="{{$blood->id}}">{{$blood->name}}</option>
                                @endforeach
                            </select>
                            @error('blood_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                            <select class="form-select my-1 mr-sm-2" wire:model="religion_father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($religions as $religion)
                                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                                @endforeach
                            </select>
                            @error('religion_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                        <textarea class="form-control" wire:model="address_father" id="exampleFormControlTextarea1" rows="4"></textarea>
                        @error('address_father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mt-3 mb-3" wire:click.post="firstStepSubmit"
                            type="button">{{trans('Parent_trans.Next')}}
                    </button>

                </div>
            </div>
        </form>
    </div>

