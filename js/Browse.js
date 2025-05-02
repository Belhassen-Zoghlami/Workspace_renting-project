const browseContainer = document.getElementById('Browse-container');
let list=
[
    {
        'title':'first workspace',
        'elem1':
        {

            'id1':'c1',
            'imagesTitle1':'1st image',
            'imagesDesc1':'1st description',
            // 'imagesUrl':'path',   to do***************************************
        },
        'elem2':
        {
            'id2':'c2',
            'imagesTitle2':'2nd image',
            'imagesDesc2':'2nd description',
            // 'imagesUrl':'path',   to do***************************************

        },
        'elem3':
        {
            'id3':'c3',
            'imagesTitle3':'3rd image',
            'imagesDesc3':'3rd description',
            // 'imagesUrl':'path',   to do***************************************

        },
        'elem4':
        {

            'id4':'c4',
            'imagesTitle4':'4th image',
            'imagesDesc4':'4th description',
            // 'imagesUrl':'path',   to do***************************************
        }
    },
    {
        'title':'second workspace',
        'elem1':
        {

            'id1':'c5',
            'imagesTitle1':'1st image',
            'imagesDesc1':'1st description',
            // 'imagesUrl':'path',   to do***************************************
        },
        'elem2':
        {
            'id2':'c6',
            'imagesTitle2':'2nd image',
            'imagesDesc2':'2nd description',
            // 'imagesUrl':'path',   to do***************************************

        },
        'elem3':
        {
            'id3':'c7',
            'imagesTitle3':'3rd image',
            'imagesDesc3':'3rd description',
            // 'imagesUrl':'path',   to do***************************************

        },
        'elem4':
        {

            'id4':'c8',
            'imagesTitle4':'4th image',
            'imagesDesc4':'4th description',
            // 'imagesUrl':'path',   to do***************************************
        }
    },
];
let content;
for (let obj in list)
{
    let o=list[obj];
    let DicLength=Object.keys(o).length
    content=
    `
    <div class="f-browse ">
    <section class="b-content">
    
    <div class="f-wrapper wrapper">
    <div class="browse-text">
    <h1 class="text-5xl text-black ">${o['title']}: </h1>

                <h4>${o['imagesTitle'+obj]}</h4>
                <p>${o['imagesDesc'+obj]}</p>
    </div>
    <div class="container">
    `
    for (i=0;i<DicLength-1;i++)
    {
        let elemIndx=i+1;

        let elemDicLength=Object.keys(o['elem1']).length
                elem=o['elem'+elemIndx];
                content+= (elemIndx===1)?`<input type="radio" name="slide${obj}" id="${elem['id'+elemIndx]}" checked>`:`<input type="radio" name="slide${obj}" id="${elem['id'+elemIndx]}">`;
                content+=
                `
                <label for="${elem['id'+elemIndx]}" class="card">
                <div class="row">
                <div class="icon">${elemIndx}</div>

                </div>
                </label>
                `
                if(elemIndx-1===elemDicLength)
                {

                    content+=
                    `
                    </div>
                        </div>
                    </section>
                </div>
                `
                browseContainer.innerHTML+=content;
                }
                }
                
    
}
