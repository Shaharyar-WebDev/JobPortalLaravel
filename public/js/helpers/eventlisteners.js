export const initEventListeners = (callback = ()=>{}) => {
    try {
        callback();
        document.addEventListener('DOMContentLoaded', callback);
        document.addEventListener('livewire:navigated', callback);
        document.addEventListener('livewire:load', callback);
    }catch(error){
        console.warn(error);
    }
}