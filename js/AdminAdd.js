
    function deleteForm(el) {
        const formToDel = document.getElementById(el);
        if (formToDel) formToDel.innerHTML = '<br>form deleted<br>';
    }

    function DeleteAllForms() {
        document.getElementById("uploadsec").innerHTML = '';
        document.getElementById("pagination").innerHTML = ''; 
        document.getElementById('numberofadds').value = 0;
    }

    function formrepea() {
        const addcontainer = document.getElementById('uploadsec');
        const numberForms = parseInt(document.getElementById('numberofadds').value);
        addcontainer.innerHTML = '';

        if (numberForms > 0) {
            forms.push(`<button class="del" type="button" name="delAll" onclick="DeleteAllForms()">Delete All</button>`);
        }

        for (let i = 0; i < numberForms; i++) {
            forms.push(`
                <div id='form${i}'>
                    <br>
                    <label for="name${i}">Workspace Name:</label>
                    <input type="text" name="name${i}">
                    <label for="title${i}">title:</label>
                    <input type="text" name="title${i}">
                    <label for="desc${i}">Description:</label>
                    <input type="text" name="desc${i}">
                    <input type="file" id="img${i}1" class='image' name="img${i}1" onchange="getImages()">
                    <input type="file" id="img${i}2" class='image' name="img${i}2" onchange="getImages()">
                    <input type="file" id="img${i}3" class='image' name="img${i}3" onchange="getImages()">
                    <input type="file" id="img${i}4" class='image' name="img${i}4" onchange="getImages()">
                    <select class="selectStatus" name="status${i}" id="wkStatus${i}">
                        <option value="open">open</option>
                        <option value="reserved">reserved</option>
                    </select>
                    <button type='button' id='m${i}' name='form${i}' class='del' onclick='deleteForm(this.name);' style='margin-top:3rem;'>Delete Workspace</button>
                    <br><br>
                </div>
            `);
        }
    }

    function getImages() {
        const files = document.querySelectorAll('.image');
        const fileinput = function () {
            const color = this.value ? 'green' : 'red';
            this.style.setProperty('color', color);
            console.log(this.value);
        };

        if (files) {
            for (let i = 0; i < files.length; i++) {
                files[i].addEventListener('change', fileinput, false);
            }
        }
    }
