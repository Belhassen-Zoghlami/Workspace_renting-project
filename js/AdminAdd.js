
   
    let forms = [];
    let currentPage = 1;
    const formsPerPage = 5;


    function displayPagination()
    {
        const pagin = document.getElementById('pagination');
        const pagComp = window.getComputedStyle(pagin);
        const paginDisplay = pagComp.getPropertyValue('display');
        if (pagin.innerHTML===''){
            pagin.style.display='none';
        }
        else
        {
            pagin.style.display='flex';
        }
        console.log('here'+pagin.innerHTML+'out');
    }
    displayPagination();


    function deleteForm(el) {
        const formToDel = document.getElementById(el);
        if (formToDel) formToDel.innerHTML = '<br>form deleted<br>';
    }

    function DeleteAllForms() {
        document.getElementById("uploadsec").innerHTML = '';
        document.getElementById("pagination").innerHTML = ''; 
        document.getElementById('numberofadds').value = 0;
        forms = []; 
        currentPage = 1;
        displayPagination();
    }

    function formrepea() {
        const addcontainer = document.getElementById('uploadsec');
        const numberForms = parseInt(document.getElementById('numberofadds').value);
        forms = []; 
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

        currentPage = 1; 
        renderPage(currentPage); 
    }

    
    function renderPage(page) {
        const start = (page-1) * formsPerPage;
        const end = start + formsPerPage;
        const displayForms = forms.slice(start, end);
        const container = document.getElementById('uploadsec');

        container.innerHTML = displayForms.join('');
        renderPagination();
        getImages(); 
    }

    function renderPagination() {
        const totalPages = Math.ceil(forms.length / formsPerPage);
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        if (totalPages <= 1) return;

        if (currentPage > 1) {
            pagination.innerHTML += `<box-icon type='solid' size="lg" style="width: 2rem; height: 2rem;display:inline-flex;align-items:center;margin-right:.5rem;" color="white" name='skip-previous-circle' onclick="changePage(${currentPage - 1})"></box-icon>`;
        }

        pagination.innerHTML += `Page ${currentPage} of ${totalPages}`;

        if (currentPage < totalPages) {
            pagination.innerHTML += `<box-icon type='solid' size="lg" style="width: 2rem; height: 2rem;display:inline-flex;align-items:center;"margin-left:.5rem; color="white" name='skip-next-circle' onclick="changePage(${currentPage + 1})"></box-icon>`;
        }
        displayPagination()
    }

    function changePage(page) {
        currentPage = page;
        renderPage(currentPage);
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
