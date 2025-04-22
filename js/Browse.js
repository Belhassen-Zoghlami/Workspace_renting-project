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
    console.log('dic',obj);
    content=
    `
    <div class="h-screen f-browse snap-start ">
    <section class="b-content">
    
    <div class="f-wrapper wrapper">
    <h1 class="text-5xl text-black ">${o['title']}: </h1>
    <div class="container">
    `
    for (i=0;i<DicLength-1;i++)
    {
        console.log(DicLength);
        let elemIndx=i+1;
        // console.log(Object.keys(o).length);
        // console.log(o['id'+i]);
        // console.log('o:',o);
        // console.log('item',item);
        console.log(o['elem'+elemIndx]);
        let elemDicLength=Object.keys(o['elem1']).length
        
        // for(j=0;j<elemDicLength;j++)
        //     {
                elem=o['elem'+elemIndx];
                // indx=j+1;
                // if(indx===elemDicLength)
                //     {
                //             counter=counter+1;
                //     } 
                console.log(elem['id'+elemIndx]);
                content+=
                `
                <input type="radio" name="slide" id="${elem['id'+elemIndx]}">
                <label for="${elem['id'+elemIndx]}" class="card">
                <div class="row">
                <div class="icon">${elemIndx}</div>
                <div class="description">
                <h4>${elem['imagesTitle'+elemIndx]}</h4>
                <p>${elem['imagesDesc'+elemIndx]}</p>
                </div>
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
                console.log('**********************end**********************');
                browseContainer.innerHTML+=content;
                }
                }
                
                // console.log(counter);

    // let item=list[itemidx];
    // console.log(list[item]);

    // console.log('index: ',itemidx);
    // console.log('index: ',item);
    
}
