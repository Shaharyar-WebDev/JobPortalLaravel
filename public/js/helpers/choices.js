export const initChoices = (element, options, dispatchEventName, type = 'select', resetBtns = null) => {
 
    if(!element.dataset.choicesInitialized){
  if(element._choicesInstance){
    element._choicesInstance.destroy();
  }
    const choices = new Choices(element, options);

    element._choicesInstance = choices;

    element.dataset.choicesInitialized = true;

    if(resetBtns){
      resetBtns.forEach(reset => {
        reset.addEventListener('click', (e)=>{
  choices.removeActiveItems();
      });
      });
    }

    element.addEventListener('change', ()=>{
     
      let options;

        try{
            console.log(element.value);
            if(type == 'select'){
       options = Array.from(element.selectedOptions).map(option => option.value);
            }
            if(type == 'input'){
              console.log(element.value.split(','));
              options = element.value.split(',')
            }

      Livewire.dispatch(`${dispatchEventName}`, { values : options });
        }catch(error){
            console.warn(error);
        }
    });
    }
}