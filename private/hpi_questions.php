<?php
require_once 'util.php';

function pageStart($HPI_data) {


    echo '<lable class="form-label mt-2 mb-1 text-dark fs-5" for="tribe">Are you part of a tribe?</lable>
               <div class="input-group input-group-md">
                   <select class="form-select" id="tribe" name="tribe">
                       <option value="yes" ' . crint($HPI_data['tribe'], "yes", "selected") . '>Yes</option>
                       <option value="no" ' . crint($HPI_data['tribe'], "no", "selected") . '>No</option>
                   </select>
               </div>
               <input type="hidden" name="page" value="1">';

}

function page2($HPI_data) {
    echo '<label for="test" class="form-label mt-2 mb-1 text-dark">Test 1</label>
                <div class="input-group input-group-md">
                    <input type="text" class="form-control form-control-md" id="test" name="test" value="' . $HPI_data['test'] . '">
                </div>
                <input type="hidden" name="page" value="2">';

}

function page3($HPI_data) {
    echo '<label for="test2" class="form-label mt-2 mb-1 text-dark">Test 2</label>
                <div class="input-group input-group-md">
                    <input type="text" class="form-control form-control-md" id="test2" name="test2" value="' . $HPI_data['test2'] . '">
                </div>
                <input type="hidden" name="page" value="3">';

}

function loadPage($hpi_page, $HPI_data) {
    switch($hpi_page) {
        case 1:
            pageStart($HPI_data);
            break;
        case 2:
            page2($HPI_data);
            break;
        case 3:
            page3($HPI_data);
            break;
    }
}

