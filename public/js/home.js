let counter = 0;
const slides = $('.slide');
const dots = $('.dot');

function autoSlides ()
{
    let current = counter % slides.length;

    
    counter++;
    slides.removeClass('active');
    dots.removeClass('active');
    slides.eq(current).addClass('active');
    dots.eq(current).addClass('active');

    setTimeout(autoSlides, 8000);

    console.log(current);
}

function changeSlidesOnClick ()
{
    let current = $(this).attr('data-index');

    counter = current;

    slides.removeClass('active');
    dots.removeClass('active');
    slides.eq(current).addClass('active');
    dots.eq(current).addClass('active');


    console.log(current);
}

function validateCheckAvailability (event)
{
    
    const night = $('#night').val();

    if (night === '0') {
        event.preventDefault();
        alert('Please choose a date');
    }
    
    
}

autoSlides();
dots.on('click', changeSlidesOnClick);
$('#check').on('submit', validateCheckAvailability);