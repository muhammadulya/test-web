function init_parent_section() {
    var html = '';

    // PARENT ACCORDION START
    html += '<div class="accordion" id="accordionExample">';
    html +=      '<div class="card">';
    html +=          '<div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
    html +=              '<h4 class="mb-0 text-white">';
    html +=              '<div class="row">';
    html +=                  '<div class="col-sm-6">';
    html +=                      '<span class="text-left">Parent Section</span>';
    html +=                  '</div>';
    html +=                  '<div class="col-sm-6">';
    html +=                      '<span class="float-right"><i class="mdi mdi-delete"></i></span>';
    html +=                      '<span class="float-right mr-2"><i class="mdi mdi-arrow-all"></i></span>';
    html +=                  '</div>';
    html +=              '</div>';
    html +=          '</div>';

    html +=          '<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">';
    html +=              '<div class="card-body">';
    html +=                  '<div class="form-group row">';
    html +=                      '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="section">Parent Section *</label>';
    html +=                      '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                          '<input type="text" class="form-control col-md-12 col-xs-12" name="section" required>';
    html +=                      '</div>';
    html +=                  '</div>';

    html +=                  '<div class="form-group row">';
    html +=                      '<label class="col-md-3 col-sm-3 col-xs-12 input-left"></label>';
    html +=                      '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                          '<button type="button" class="btn btn-outline-dark btn-block" onclick="add_content_element();">Add Content Element</button>';
    html +=                      '</div>';
    html +=                  '</div>';
    html +=              '</div>';

    // =================== DROP CONTENT ELEMENT HERE ===================
    html +=             '<div id="drop-content-element"></div>';
    // =================== DROP CONTENT ELEMENT HERE ===================

    html +=          '</div>';
    html +=      '</div>';
    html += '</div>';
    // PARENT ACCORDION END

    $('#drop-section').append(html);
}

function init_content_element() {
    var html = '';

    // MASTHEAD ACCORDION START
    html += '<div class="col-md-12">';
    html +=     '<div class="accordion" id="accordionExample2">';
    html +=         '<div class="card">';
    html +=             '<div class="card-header bg-dark" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">';
    html +=                 '<h4 class="mb-0 text-white">';
    html +=                     '<div class="row">';
    html +=                         '<div class="col-sm-6">';
    html +=                             '<span class="text-left">Masthead Section</span>';
    html +=                         '</div>';

    html +=                         '<div class="col-sm-6">';
    html +=                             '<span class="float-right"><i class="mdi mdi-delete"></i></span>';
    html +=                             '<span class="float-right mr-2"><i class="mdi mdi-arrow-all"></i></span>';
    html +=                         '</div>';
    html +=                     '</div>';
    html +=                 '</h4>';
    html +=             '</div>';
    html +=         '</div>';

    html +=         '<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">';
    html +=             '<div class="card-body">';
    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="section">Masthead Section *</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<input type="text" class="form-control col-md-12 col-xs-12" name="section" required>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="status">Masthead Status</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
    html +=                             '<label class="btn btn-outline-success">';
    html +=                                 '<input type="radio" name="status" value="1">Active';
    html +=                             '</label>';
    html +=                             '<label class="btn btn-outline-dark">';
    html +=                                 '<input type="radio" name="status" value="0">Non-Active';
    html +=                             '</label>';
    html +=                         '</div>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left"></label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<button type="button" class="btn btn-outline-dark btn-block" onclick="add_content_item()">Add Item</button>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=             '</div>';
    html +=         '</div>';
    html +=         '<div id="drop-item"></div>';
    html +=     '</div>';
    html += '</div>';
    // MASTHEAD ACCORDION END

    $('#drop-content-element').append(html);
}

function init_item_masterhead() {
    var html = '';
    // MASTHEAD ITEM START
    html += '<div class="col-md-12">';
    html +=     '<div class="accordion" id="accordionExample3"></div>';
    html +=         '<div class="card">';
    html +=             '<div class="card-header bg-dark" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">';
    html +=                 '<h4 class="mb-0 text-white">';
    html +=                     '<div class="row">';
    html +=                         '<div class="col-sm-6">';
    html +=                             '<span class="text-left">Masthead Item</span>';
    html +=                         '</div>';

    html +=                         '<div class="col-sm-6">';
    html +=                             '<span class="float-right"><i class="mdi mdi-delete"></i></span>';
    html +=                             '<span class="float-right mr-2"><i class="mdi mdi-arrow-all"></i></span>';
    html +=                         '</div>';
    html +=                     '</div>';
    html +=                 '</h4>';
    html +=             '</div>';
    html +=         '</div>';
    html +=         '<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">';
    html +=             '<div class="card-body">';
    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="masthead-image">Image *</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<div class="text-center">';
    html +=                             '<img src="{{ $image }}" id="image-preview">';
    html +=                         '</div>';
    html +=                         '<input type="file" class="form-control col-md-12 col-xs-12" name="masthead_image" accept=".jpg, .jpeg, .png" onchange="read_url(this,`masthead-image-preview`)">';
    html +=                         '<small>Recommended image size is 40 x 40 px, circular and transparent PNG file.</small>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="title">Title *</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<input type="text" class="form-control col-md-12 col-xs-12" name="title" required>';
    html +=                     '</div>';
    html +=                 '</div>';

                            // CONTENT WIDTH -> 1 TO 12
    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="width">Width *</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<input type="number" min="1" max="12" class="form-control col-md-12 col-xs-12" name="width" required>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=                 '<div class="form-group row">';
    html +=                     '<label class="col-md-3 col-sm-3 col-xs-12 input-left" for="align">Align *</label>';
    html +=                     '<div class="col-md-7 col-sm-7 col-xs-12">';
    html +=                         '<select class="select2 form-control" id="align" name="align" required>';
    html +=                             '<option selected disabled>- Please Choose One -</option>';
    html +=                             '<option value="left">Left</option>';
    html +=                             '<option value="center">Center</option>';
    html +=                             '<option value="right">Right</option>';
    html +=                         '</select>';
    html +=                     '</div>';
    html +=                 '</div>';

    html +=             '</div>';
    html +=         '</div>';
    html +=     '</div>';
    html += '</div>';
    // MASTHEAD ITEM END

    $('#drop-item').append(html);
}