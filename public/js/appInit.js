export const appInit = () => {
  
    try{
    function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme); // Save theme preference
  }
  const savedTheme = localStorage.getItem('theme') || 'default';
    document.documentElement.setAttribute('data-theme', savedTheme);

    // Set the checked radio button
    const selectedRadio = document.querySelector(`input[value="${savedTheme}"]`);
    if (selectedRadio) selectedRadio.checked = true;

    // Add event listener to theme buttons
    document.querySelectorAll('.theme-controller').forEach((radio) => {
      radio.addEventListener('change', function () {
        setTheme(this.value);
      });
    });
}catch(error){
    console.warn(error);
}

  }
  