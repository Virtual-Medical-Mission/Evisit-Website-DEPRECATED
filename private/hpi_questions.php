<?php
require_once 'util.php';

function pageStart($HPI_data, $errors) {


    echo '<label class="form-label mt-2" for="language">Primary Language</label>
        <div class="input-group-md">
            <select class="form-select" name="language" id="language">
                <option value="english"' . crint($HPI_data['language'], 'english', 'selected') .'>English</option>
                <option value="swahili"' . crint($HPI_data['language'], 'swahili', 'selected') .'>Swahili</option>
            </select>
        </div>
        <label class="form-label mt-2" for="tribe">Are you part of a tribe?</label>
        <div class="input-group-md">
            <select class="form-select" name="tribe" id="tribe">
                <option value="yes"' . crint($HPI_data['tribe'], 'yes', 'selected') .'>Yes</option>
                <option value="no"' . crint($HPI_data['tribe'], 'no', 'selected') .'>No</option>
            </select>
        </div>
        <label class="form-label mt-2" for="location">Where have you lived for the past 6 weeks?</label>
        <div class="input-group-md">
            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="' . $HPI_data['location'] .'">
        </div>
        '. hpi_error($errors, 'location') .'
        <label class="form-label mt-2" for="start_date">When did you start living in that location?</label>
        <div class="input-group-md">
            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" value="'.$HPI_data['start_date'].'">
        </div>';

}

function page2($HPI_data, $errors) {
    echo '<label for="medical_conditions" class="form-label mt-2">Do you have any chronic medical conditions? If so, please list them:</label>
        <div class="input-group-md">
            <input type="textarea" class="form-control" name="medical_conditions" id="medical_conditions" value="'.$HPI_data['medical_conditions'].'">
        </div>
        '. hpi_error($errors, 'medical_conditions') .'

        <label for="medications" class="form-label mt-2">Do you take any medications? If so, please list them:</label>
        <div class="input-group-md">
            <input type="textarea" class="form-control" name="medications" id="medications" value="'.$HPI_data['medications'].'">
        </div>
        '. hpi_error($errors, 'medications') .'

        <label for="surgeries" class="form-label mt-2">Have you had any surgeries in the past? If so, please list them:</label>
        <div class="input-group-md">
            <input type="textarea" class="form-control" name="surgeries" id="surgeries" value="'.$HPI_data['surgeries'].'">
        </div>
        '. hpi_error($errors, 'surgeries') .'

        <label for="allergies" class="form-label mt-2">Do you have any allergies? If so, please list them:</label>
        <div class="input-group-md">
            <input type="textarea" class="form-control" name="allergies" id="allergies" value="'.$HPI_data['allergies'].'">
        </div>
        '. hpi_error($errors, 'allergies') .'

        <label for="hospitalized" class="form-label mt-2">Have you ever been hospitalized?</label>
        <div class="input-group-md">
            <select class="form-select" name="hospitalized" id="hospitalized">
                <option value="no" '. crint($HPI_data['hospitalized'], 'no', 'selected') .'>No</option>
                <option value="yes" '. crint($HPI_data['hospitalized'], 'yes', 'selected') .'>Yes</option>
            </select>
        </div>';

}

function page3($HPI_data, $errors) {
    echo '<label for="clean_water" class="form-label">Do you have access to clean water?</label>
        <div class="input-group-md">
            <select class="form-select" name="clean_water">
                <option value="yes" '. crint($HPI_data['clean_water'], 'yes', 'selected') .'>Yes</option>
                <option value="no" '. crint($HPI_data['clean_water'], 'no', 'selected') .'>No</option>
            </select>
        </div>
        <label for="transportation" class="form-label">What is your primary method of transportation</label>
        <div class="input-group-md">
            <input type="text" name="transportation" class="form-control" id="transportation" list="options" value="' . $HPI_data['transportation'] .'">
                <datalist id="options">
                    <option value="car">
                    <option value="bus">
                    <option value="bike">
                    <option value="walk">
                </datalist>
        </div>
        '. hpi_error($errors, 'transportation') .'
        <label for="immunizations" class="form-label">Are you up to date on all of your immunizations?</label>
        <div class="input-group-md">
            <select class="form-select" name="immunizations">
                <option value="yes" '. crint($HPI_data['immunizations'], 'yes', 'selected') .'>Yes</option>
                <option value="no" '. crint($HPI_data['immunizations'], 'no', 'selected') .'>No</option>
            </select>
        </div>

        <label for="dietary_restrictions" class="form-label">Do you have any dietary restrictions? If so, please list them:</label>
        <div class="input-group-md">
            <input type="text" name="dietary_restrictions" class="form-control" id="dietary_restrictions" list="food_groups" value="' . $HPI_data['dietary_restrictions'] .'">
                <datalist id="food_groups">
                    <option value="vegetarian">
                    <option value="vegan">
                    <option value="gluten-free">
                    <option value="dairy-free">
                    <option value="kosher">
                    <option value="halal">
                </datalist>
        </div>
        '. hpi_error($errors, 'dietary_restrictions');

}

function page4($HPI_data, $errors) {
    echo ' <label class="form-label" for="smoke_rate">How often do you smoke?</label>
        <div class="input-group-md">
            <select class="form-select" name="smoke_rate" id="smoke_rate">
                <option value="never"  '. crint($HPI_data['smoke_rate'], 'never', 'selected') .'>Never</option>
                <option value="occasionally" '. crint($HPI_data['smoke_rate'], 'occasionally', 'selected') .'>Occasionally</option>
                <option value="daily" '. crint($HPI_data['smoke_rate'], 'daily', 'selected') .'>Daily</option>
            </select>
        </div>

        <label class="form-label" for="alcohol_rate">How often do you drink alcohol?</label>
        <div class="input-group-md">
            <select class="form-select" name="alcohol_rate" id="alcohol_rate">
                <option value="never" '. crint($HPI_data['alcohol_rate'], 'never', 'selected') .'>Never</option>
                <option value="occasionally" '. crint($HPI_data['alcohol_rate'], 'occasionally', 'selected') .'>Occasionally</option>
                <option value="daily" '. crint($HPI_data['alcohol_rate'], 'daily', 'selected') .'>Daily</option>
            </select>
        </div>

        <label class="form-label" for="drug_rate">How often do you use recreational drugs?</label>
        <div class="input-group-md">
            <select class="form-select" name="drug_rate" id="drug_rate">
                <option value="never" '. crint($HPI_data['drug_rate'], 'never', 'selected') .'>Never</option>
                <option value="occasionally" '. crint($HPI_data['drug_rate'], 'occasionally', 'selected') .'>Occasionally</option>
                <option value="daily" '. crint($HPI_data['drug_rate'], 'daily', 'selected') .'>Daily</option>
            </select>
        </div>

        <label class="form-label" for="physical_activities">Do you engage in physical activities? If so, please list them:</label>
        <div class="input-group-md">
            <input class="form-control" type="text" name="physical_activities" id="physical_activities" placeholder="Physical Activities" value="' . $HPI_data['physical_activities'] .'">
        </div>
        '. hpi_error($errors, 'physical_activities') .'

        <label class="form-label" for="family_history">Do you have any family history of disease? If so, please list them:</label>
        <div class="input-group-md">
            <input class="form-control" type="text" name="family_history" id="family_history" placeholder="Family History" value="' . $HPI_data['family_history'] .'">
        </div>
        '. hpi_error($errors, 'family_history');

}



function loadPage($hpi_page, $HPI_data, $errors) {
    switch($hpi_page) {
        case 1:
            pageStart($HPI_data, $errors);
            break;
        case 2:
            page2($HPI_data, $errors);
            break;
        case 3:
            page3($HPI_data, $errors);
            break;

        case 4:
            page4($HPI_data, $errors);
            break;

    }

}

