

<div  class="row-fluid">
    <p>Kindly provide your information in the forms provided. This will be verified by the management before approval.</p>

    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-success' : 'btn-danger' }}">1</a>
                <p class="small">Bio Data</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-success' : 'btn-danger' }}">2</a>
                <p class="small">Employment Details</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-success' : 'btn-danger' }}" >3</a>
                <p class="small">Area of Interest</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-success' : 'btn-danger' }}" disabled="disabled">4</a>
                <p class="small">Emergency Contact</p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">

            <h3 class="text-center"> Bio Data</h3>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="taskSurname">Profile photo:</label>
                        <input type="file" wire:model="photo">
                        @error('photo') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="taskSurname">Surname:</label>
                        <input type="text" wire:model="surname" class="form-control" id="taskSurname">
                        @error('surname') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskFirstName">First Name:</label>
                        <input type="text" wire:model="first_name" class="form-control" id="taskFirstName">
                        @error('first_name') <div class="invalid-feedback" style="display: block">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskMiddleName">Middle Name:</label>
                        <input type="text" wire:model="middle_name" class="form-control" id="taskMiddleName">
                        @error('middle_name') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskEmail">Email:</label>
                        <input type="text" wire:model="email" readonly class="form-control" id="taskEmail">
                        @error('email') <span class="invalid-feedback help-text-error" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskMobile">Mobile:</label>
                        <input type="text" wire:model="mobile" readonly class="form-control" id="taskMobile">
                        @error('mobile') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskAltMobile">Alternate Mobile:</label>
                        <input type="text" wire:model="alt_mobile" class="form-control" id="taskAltMobile">
                        @error('alt_mobile') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskAddress">Address:</label>
                        <input type="text" wire:model="address" class="form-control" id="taskAddress">
                        @error('address') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskDateOfBirth">Date of Birth:</label>
                        <input type="date" wire:model="date_of_birth" class="form-control" id="taskDateOfBirth">
                        @error('date_of_birth') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskGender">Gender:</label>
                        <select wire:model="gender" class="form-control" id="taskGender">
                            <option></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskNationality">Nationality:</label>
                        <select wire:model="nationality" class="form-control" id="taskNationality">
                            <option></option>
                            <option>Nigerian</option>
                            <option>Other</option>
                        </select>
                        @error('nationality') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskBloodGroup">Blood Group:</label>
                        <select wire:model="blood_group" class="form-control" id="taskBloodGroup">
                            <option></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        @error('blood_group') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taskGenotype">Genotype:</label>
                        <select wire:model="genotype" class="form-control" id="taskGenotype">
                            <option></option>
                            <option value="AA">AA</option>
                            <option value="AS">AS</option>
                            <option value="AC">AC</option>
                            <option value="SS">SS</option>
                            <option value="SC">SC</option>
                            <option value="CC">CC</option>
                            <option value="OO">OO</option>
                        </select>
                        @error('genotype') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 float-right">
                        <button class="btn btn-secondary btn-lg btn-block" wire:click="firstStepSubmit" type="button">Next</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="">
                <h3> Employment Details</h3>
                <form class="needs-validation" novalidate>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="title">Occupation:</label>
                        <select  wire:model="occupation" class="form-control" id="taskOccupation">
                            <option></option>
                            @foreach($occupations as $record)
                                <option value="{{$record->id}}">{{$record->name}}</option>
                            @endforeach
                        </select>
                        @error('occupation') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="title">Profession/Discipline:</label>
                        <select  wire:model="profession" class="form-control" id="taskProfession">
                            <option></option>
                            @foreach($professions as $record)
                                <option value="{{$record->id}}" >{{$record->name}}</option>
                            @endforeach
                        </select>
                        @error('profession') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="title">Name of Organization:</label>
                        <input type="text" wire:model="name_of_organization" class="form-control" id="taskNameOfOrganization">
                        @error('name_of_organization') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="title">Type of Organization:</label>
                        <select  wire:model="type_of_organization" class="form-control" id="taskTypeOfOrganization">
                            <option></option>
                            <option>Private</option>
                            <option>Government</option>
                            <option>Force</option>
                            <option>NGO</option>
                            <option>International</option>
                            <option>Other</option>
                        </select>
                        @error('type_of_organization') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="title">Office Address:</label>
                        <input type="text" wire:model="office_address" class="form-control" id="taskOfficeAddress">
                        @error('office_address') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <button class="btn btn-danger nextBtn btn-lg btn-block" type="button" wire:click="back(1)">Back</button>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button class="btn btn-secondary nextBtn btn-lg btn-block" type="button" wire:click="secondStepSubmit">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="col-md-12">
                <h3> Area of Interest</h3>
                <form class="needs-validation" novalidate>
                <div class="row">


                    <div class="col-md-4 mb-3">
                        <label for="title">Area of Interest:</label>
                        <select  wire:model="area_of_interest" class="form-control" id="taskAreaOfInterest">
                            <option></option>
                            <option>Polo Club Membership</option>
                            <option>Social Membership</option>
                        </select>
                        @error('area_of_interest') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <labhel for="title">Membership Category:</labhel>
                        <select  wire:model="category" class="form-control" id="taskCategory">
                            <option></option>
                            @foreach($membershipCategories as $record)
                                <option value="{{$record->id}}">{{$record->name}}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description">Are you a member of another club?</label><br/>
                        <label class="radio-inline"><input type="radio" wire:model="other_membership" value="1" {{{ $other_membership == '1' ? "checked" : "" }}}> Yes</label>
                        <label class="radio-inline"><input type="radio" wire:model="other_membership" value="0" {{{ $other_membership == '0' ? "checked" : "" }}}> No</label>
                        @error('other_membership') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="title">Name of Club:</label>
                        <input type="text" wire:model="other_club" class="form-control" id="taskOther">
                        @error('other_club') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description">Have you been involved in polo?</label><br/>
                        <label class="radio-inline"><input type="radio" wire:model="involved_in_polo" value="1" {{{ $involved_in_polo == '1' ? "checked" : "" }}}> Yes</label>
                        <label class="radio-inline"><input type="radio" wire:model="involved_in_polo" value="0" {{{ $involved_in_polo == '0' ? "checked" : "" }}}> No</label>
                        @error('involved_in_polo') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description">Are you a horse owner?</label><br/>
                        <label class="radio-inline"><input type="radio" wire:model="horse_owner" value="1" {{{ $horse_owner == '1' ? "checked" : "" }}}> Yes</label>
                        <label class="radio-inline"><input type="radio" wire:model="horse_owner" value="0" {{{ $horse_owner == '0' ? "checked" : "" }}}> No</label>
                        @error('horse_owner') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="title">Number of horses owned:</label>
                        <input type="number" wire:model="number_of_horses" class="form-control" id="taskNumberOfHorses">
                        @error('number_of_horses') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <button class="btn btn-danger nextBtn btn-lg btn-block" type="button" wire:click="back(2)">Back</button>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button class="btn btn-secondary nextBtn btn-lg btn-block" type="button" wire:click="thirdStepSubmit">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
            <div class="col-md-12">
                <h3> Emergency Contact</h3>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="title">Name:</label>
                            <input type="text" wire:model="emergency_contact_name" class="form-control" id="taskEmergencyContactName">
                            @error('emergency_contact_name') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="title">Mobile</label>
                            <input type="text" wire:model="emergency_contact_mobile" class="form-control" id="taskEmergencyContactMobile">
                            @error('emergency_contact_mobile') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="title">Relationship:</label>
                            <input type="text" wire:model="emergency_contact_relationship" class="form-control" id="taskEmergencyContactRelationship">
                            @error('emergency_contact_relationship') <span class="invalid-feedback" style="display: block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-danger nextBtn btn-lg btn-block" type="button" wire:click="back(3)">Back</button>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-success nextBtn btn-lg btn-block" type="button" wire:click="submitForm">Finish & Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
