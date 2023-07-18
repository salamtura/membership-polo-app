

<div  class="col-md-12">
    <p>Kindly provide your details in the forms provided. Details will be verified by the management and approved.</p>

    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Bio Data</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Employment Details</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" >3</a>
                <p>Area of Interest</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">4</a>
                <p>Emergency Contact</p>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-md-12">
            <div class="col-md-12" >
                <h3> Bio Data</h3>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="taskSurname">Surname:</label>
                            <input type="text" wire:model="surname" class="form-control" id="taskSurname">
                            @error('surname') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="taskFirstName">First Name:</label>
                            <input type="text" wire:model="first_name" class="form-control" id="taskFirstName">
                            @error('first_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="taskMiddleName">Middle Name:</label>
                            <input type="text" wire:model="middle_name" class="form-control" id="taskMiddleName">
                            @error('middle_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Email:</label>
                            <input type="text" wire:model="email" class="form-control" id="taskEmail">
                            @error('email') <span class="error help-text-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Mobile:</label>
                            <input type="text" wire:model="mobile" class="form-control" id="taskMobile">
                            @error('mobile') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Alternate Mobile:</label>
                            <input type="text" wire:model="alt_mobile" class="form-control" id="taskAltMobile">
                            @error('alt_mobile') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="title">Address:</label>
                            <input type="text" wire:model="address" class="form-control" id="taskAddress">
                            @error('address') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Date of Birth:</label>
                            <input type="date" wire:model="date_of_birth" class="form-control" id="taskDateOfBirth">
                            @error('date_of_birth') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Gender:</label>
                            <select  wire:model="gender" class="form-control" id="taskGender">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            @error('gender') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Nationality:</label>
                            <select  wire:model="nationality" class="form-control" id="taskNationality">
                                <option></option>
                                <option>Nigerian</option>
                                <option>Other</option>
                            </select>
                            @error('nationality') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Blood Group:</label>
                            <select  wire:model="blood_group" class="form-control" id="taskBloodGroup">
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
                            @error('blood_group') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="title">Genotype:</label>
                            <select  wire:model="genotype" class="form-control" id="taskGenotype">
                                <option></option>
                                <option value="AA">AA</option>
                                <option value="AS">AS</option>
                                <option value="AC">AC</option>
                                <option value="SS">SS</option>
                                <option value="SC">SC</option>
                                <option value="CC">CC</option>
                                <option value="OO">OO</option>
                            </select>
                            @error('genotype') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div col-md-6 mb-3>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Employment Details</h3>

                <div class="form-group">
                    <label for="title">Occupation:</label>
                    <select  wire:model="occupation" class="form-control" id="taskOccupation">
                        <option></option>
                        <option>Public Servant</option>
                        <option>Civil Servant</option>
                        <option>Military</option>
                        <option>Self Employed</option>
                    </select>
                    @error('occupation') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Profession/Discipline:</label>
                    <select  wire:model="profession" class="form-control" id="taskProfession">
                        <option></option>
                        <option value="doctor">Doctor</option>
                        <option value="engineer">Engineer</option>
                        <option value="teacher">Teacher</option>
                        <option value="lawyer">Lawyer</option>
                        <option value="artist">Artist</option>
                        <option value="scientist">Scientist</option>
                        <option value="scientist">Scientist</option>
                    </select>
                    @error('profession') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Name of Organization:</label>
                    <input type="text" wire:model="name_of_organization" class="form-control" id="taskNameOfOrganization">
                    @error('name_of_organization') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Type of Organization:</label>
                    <select  wire:model="type_of_organization" class="form-control" id="taskTypeOfOrganization">
                        <option></option>
                        <option>Private</option>
                        <option>Government</option>
                        <option>Force</option>
                        <option>NGO</option>
                        <option>Other</option>
                    </select>
                    @error('type_of_organization') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Office Address:</label>
                    <input type="text" wire:model="office_address" class="form-control" id="taskOfficeAddress">
                    @error('office_address') <span class="error">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Area of Interest</h3>

                <div class="form-group">
                    <label for="title">Area of Interest:</label>
                    <select  wire:model="area_of_interest" class="form-control" id="taskAreaOfInterest">
                        <option></option>
                        <option>Polo Club Membership</option>
                        <option>Social Membership</option>
                    </select>
                    @error('area_of_interest') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <labhel for="title">Membership Category:</labhel>
                    <select  wire:model="category" class="form-control" id="taskCategory">
                        <option></option>
                        <option>Full Membership</option>
                        <option>Social Membership</option>
                        <option>Family Membership</option>
                        <option>Social Membership</option>
                        <option>Junior Membership</option>
                        <option>Foriegn Membership</option>
                    </select>
                    @error('category') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Are you a member of another club?</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="other_membership" value="1" {{{ $other_membership == '1' ? "checked" : "" }}}> Yes</label>
                    <label class="radio-inline"><input type="radio" wire:model="other_membership" value="0" {{{ $other_membership == '0' ? "checked" : "" }}}> No</label>
                    @error('other_membership') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Name of Club:</label>
                    <input type="text" wire:model="other_club" class="form-control" id="taskOther">
                    @error('other_club') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Have you been involved in polo?</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="involved_in_polo" value="1" {{{ $involved_in_polo == '1' ? "checked" : "" }}}> Yes</label>
                    <label class="radio-inline"><input type="radio" wire:model="involved_in_polo" value="0" {{{ $involved_in_polo == '0' ? "checked" : "" }}}> No</label>
                    @error('involved_in_polo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Are you a horse owner?</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="horse_owner" value="1" {{{ $horse_owner == '1' ? "checked" : "" }}}> Yes</label>
                    <label class="radio-inline"><input type="radio" wire:model="horse_owner" value="0" {{{ $horse_owner == '0' ? "checked" : "" }}}> No</label>
                    @error('horse_owner') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Number of horses owned:</label>
                    <input type="number" wire:model="number_of_horses" class="form-control" id="taskNumberOfHorses">
                    @error('number_of_horses') <span class="error">{{ $message }}</span> @enderror
                </div>


                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Emergency Contact</h3>


                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" wire:model="emergency_contact_name" class="form-control" id="taskEmergencyContactName">
                    @error('emergency_contact_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Mobile</label>
                    <input type="text" wire:model="emergency_contact_mobile" class="form-control" id="taskEmergencyContactMobile">
                    @error('emergency_contact_mobile') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="title">Relationship:</label>
                    <input type="text" wire:model="emergency_contact_relationship" class="form-control" id="taskEmergencyContactRelationship">
                    @error('emergency_contact_relationship') <span class="error">{{ $message }}</span> @enderror
                </div>


                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Back</button>
            </div>
        </div>
    </div>
</div>
