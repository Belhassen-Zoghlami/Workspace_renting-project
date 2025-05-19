const observer = new IntersectionObserver((entries) => 
{
    entries.forEach((entry) => 
    {
        if (entry.isIntersecting)
        {
            entry.target.classList.add('show');
        }
        else
        {
            entry.target.classList.remove('show');
        }
    });
});

const hiddenElementsV = document.querySelectorAll(".hidenv");
const hiddenElementsH = document.querySelectorAll(".hidenh");
hiddenElementsV.forEach((el) => observer.observe(el));
hiddenElementsH.forEach((el) => observer.observe(el));
