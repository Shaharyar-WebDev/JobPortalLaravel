import { initEventListeners } from "../helpers/eventlisteners.js";
import { initChoices } from '../helpers/choices.js';

const initEmployerAddJobs = () => {

    try{

    const skills = document.querySelector('#skills');

    const resetRequirements = document.querySelector("#resetRequirements");

    const custom_skills = document.querySelector('#custom_skills');

    const educations = document.querySelector('#educations');

    const custon_educations = document.querySelector('#custon_educations');

    const description = document.querySelector('.trix-editor');

    description.addEventListener('trix-change', function(e){
        let value;
        console.log(description.value);
        value = description.value;
        Livewire.dispatch('DescriptionUpdate', { value });
    });


      initChoices(skills, {
        removeItemButton: true,
        placeholderValue: 'Select Skills',
      }, 'SelectedSkills', 'select', resetRequirements);

      initChoices(educations, {
        removeItemButton: true,
        placeholderValue: 'Select Educations',
      }, 'SelectedEducations', 'select', resetRequirements);

      initChoices(custom_skills, {
        removeItemButton: true,
        placeholderValue: 'Enter Custom Skills',
      }, 'CustomSkills','input', resetRequirements);

      initChoices(custon_educations, {
        removeItemButton: true,
        placeholderValue: 'Enter Custom Educations',
      }, 'CustomEducations','input', resetRequirements);

    }catch(error){
        console.warn(error);
    }
}

initEventListeners(initEmployerAddJobs);