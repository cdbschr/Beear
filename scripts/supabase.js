const { createClient } = supabase;
supabase = createClient("https://uxiekmramqhjlvmvpqnp.supabase.co", "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJvbGUiOiJhbm9uIiwiaWF0IjoxNjQzMTA4MDc3LCJleHAiOjE5NTg2ODQwNzd9.31GxKo6JeEOc-2tHPBZbuFZ7sUv-Cps_iyoe-MH2TuQ");

const contactForm = document.querySelector('#contactform');
contactForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const contactFormInput = contactForm.querySelectorAll ('input, textarea');
    let submission = {};

    contactFormInput.forEach(e => {
        const {value, name} = e;
        if (value && name != "") {
            submission[name] = value;
        }
    })

    const {error, data} = await supabase.from('contactForm').insert([submission]);

    // console.log({error, data});
    
    let validateSend = document.querySelector('#validate-send');
    let paragraph = document.createElement('p');
    validateSend.appendChild(paragraph);

    if (error) {
      paragraph.innerText = "Une erreur s'est produite, veuillez réessayer.";  
    } else {
      paragraph.innerText = "Votre demande sera traité dans les plus brefs délais.";
    }

    contactFormInput.forEach(e => e.value= "");
})