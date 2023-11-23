
<form action="<?= BASE_URL . 'AdminController/updateRoomType/' . $data['roomTypeData'][0]['id_loaiphong'] ?>" method="POST"
      enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật loại phòng</h4>
            <label>Tên loại phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="roomType" placeholder="name"
                       value="<?= $data['roomTypeData'][0]['ten'] ?>">
            </div>
            <label>Giá</label>
            <div class="input-group">
                <input type="number" class="form-control" name="price" placeholder="price"
                       value="<?= $data['roomTypeData'][0]['gia'] ?>">
            </div>
            <input type="hidden" name="id_update1" value="<?= $data['roomTypeData'][0]['id_loaiphong'] ?>">
            <label>Sức chứa</label>
            <div class="input-group">
                <input type="number" class="form-control" name="capacity" placeholder="capacity"
                       value="<?= $data['roomTypeData'][0]['suc_chua'] ?>">
            </div>
            <label>File Upload</label>

            <div class="input-group">
                <div class="custom-file">
                    <input
                            type="file"
                            class="custom-file-input"
                            id="validatedCustomFile"
                            multiple
                            name="images[]"
                    />
                    <label
                            class="custom-file-label"
                            for="validatedCustomFile"
                    >Choose file...</label
                    >
                    <div class="invalid-feedback">
                        Example invalid custom file feedback
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-light" style="display: grid;grid-template-columns: 1fr 1fr 1fr">
                <?php foreach ($data['imagesData'] as $image): ?>

                    <tr>
                        <td><img src="<?= BASE_URL . $image['path'] ?>" alt="" width="50px" height="50px"
                                 style="object-fit: cover"></td>
                        <td><a href="<?= BASE_URL . 'ImageController/deleteBackUpdate/' . $image['id']  ?>"
                               class="btn btn-warning">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>

                </thead>
            </table>
            <label>Nội thất</label>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Multiple Select</label>
                <div class="col-md-9">
                    <select
                            class="select2 form-control m-t-15"
                            multiple="multiple"
                            style="height: 36px; width: 100%"
                    >
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM" selected>New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD" selected>South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <table class="table">
                    <thead class="thead-light" style="display: grid;grid-template-columns: 1fr 1fr 1fr">
                    <?php foreach ($data['noiThatData'] as $item): ?>

                        <tr>
                            <td><?= $item['ten_noithat'] ?></td>
                            <td><a href="<?= BASE_URL . 'NoiThatController/deleteBackUpdate/' . $item['id'].'/'.$data['roomTypeData'][0]['id_loaiphong'] ?>"
                                   class="btn btn-warning">Xóa</a></td>
                        </tr>
                    <?php endforeach; ?>

                    </thead>
                </table>
            </div>

        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="id_update" class="btn btn-success">Save
                    <button
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <a type="submit" class="btn btn-info" href="<?= BASE_URL . 'RoomTypeController/homePage' ?>">Danh
                        sách</a>
            </div>
        </div>
    </div>

</form

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Elements</h5>
        <div class="form-group row">
            <label class="col-md-3 m-t-15">Single Select</label>
            <div class="col-md-9">
                <select
                        class="select2 form-control custom-select"
                        style="width: 100%; height: 36px"
                >
                    <option>Select</option>
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX">Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 m-t-15">Multiple Select</label>
            <div class="col-md-9">
                <select
                        class="select2 form-control m-t-15"
                        multiple="multiple"
                        style="height: 36px; width: 100%"
                >
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                    </optgroup>
                    <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NM" selected>New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                    </optgroup>
                    <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD" selected>South Dakota</option>
                        <option value="TX">Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                    </optgroup>
                    <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3">Radio Buttons</label>
            <div class="col-md-9">
                <div class="custom-control custom-radio">
                    <input
                            type="radio"
                            class="custom-control-input"
                            id="customControlValidation1"
                            name="radio-stacked"
                            required
                    />
                    <label
                            class="custom-control-label"
                            for="customControlValidation1"
                    >First One</label
                    >
                </div>
                <div class="custom-control custom-radio">
                    <input
                            type="radio"
                            class="custom-control-input"
                            id="customControlValidation2"
                            name="radio-stacked"
                            required
                    />
                    <label
                            class="custom-control-label"
                            for="customControlValidation2"
                    >Second One</label
                    >
                </div>
                <div class="custom-control custom-radio">
                    <input
                            type="radio"
                            class="custom-control-input"
                            id="customControlValidation3"
                            name="radio-stacked"
                            required
                    />
                    <label
                            class="custom-control-label"
                            for="customControlValidation3"
                    >Third One</label
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3">Checkboxes</label>
            <div class="col-md-9">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customControlAutosizing1"
                    />
                    <label
                            class="custom-control-label"
                            for="customControlAutosizing1"
                    >First One</label
                    >
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customControlAutosizing2"
                    />
                    <label
                            class="custom-control-label"
                            for="customControlAutosizing2"
                    >Second One</label
                    >
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customControlAutosizing3"
                    />
                    <label
                            class="custom-control-label"
                            for="customControlAutosizing3"
                    >Third One</label
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3">File Upload</label>
            <div class="col-md-9">
                <div class="custom-file">
                    <input
                            type="file"
                            class="custom-file-input"
                            id="validatedCustomFile"
                            required
                    />
                    <label
                            class="custom-file-label"
                            for="validatedCustomFile"
                    >Choose file...</label
                    >
                    <div class="invalid-feedback">
                        Example invalid custom file feedback
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="disabledTextInput"
            >Disabled input</label
            >
            <div class="col-md-9">
                <input
                        type="text"
                        id="disabledTextInput"
                        class="form-control"
                        placeholder="Disabled input"
                        disabled
                />
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="button" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</div>