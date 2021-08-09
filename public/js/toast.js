const alerts = document.querySelectorAll('.alert');
const toast = document.querySelector('.custom-toast');

function hideAlert ()
{

    if (alerts.length > 0) {
        
        alerts.forEach(alert => {
            if (alert.classList.contains('show')) {
                setTimeout(() => {
                    let parent = alert.parentElement;
                    parent.removeChild(alert);
                }, 3000)
            }
        })
    } 

    
}

function hideToast ()
{
    if (toast !== null) {

        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000)
    }
}

document.addEventListener('DOMContentLoaded', hideAlert);
document.addEventListener('DOMContentLoaded', hideToast);