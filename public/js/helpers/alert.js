export const showToast = ({
    message = "Something happened!",
    type = "success", // success | error | warning | info
    duration = 3000 // in milliseconds
} = {}) => {
    const toastContainer = document.createElement("div");
    toastContainer.className = "toast toast-top top-20 toast-center md:toast-end z-50";

    const alertBox = document.createElement("div");
    alertBox.className = `alert alert-${type} shadow-lg max-w-md`;

    const iconSVGs = {
        success: `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                   </svg>`,
        error: `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>`,
        warning: `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856C18.07 19 19 18.07 19 17V7c0-1.07-.93-2-2.082-2H7.082C6.03 5 5 5.93 5 7v10c0 1.07.93 2 2.062 2z"/>
                 </svg>`,
        info: `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
               </svg>`
    };

    alertBox.innerHTML = `
        <div class="flex items-center gap-2">
            ${iconSVGs[type] || ""}
            <span>${message}</span>
        </div>
        <button class="btn btn-ghost btn-xs ml-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    `;

    // close on button click
    alertBox.querySelector("button").onclick = () => {
        toastContainer.remove();
    };

    toastContainer.appendChild(alertBox);
    document.body.appendChild(toastContainer);

    // auto remove after duration
    setTimeout(() => {
        toastContainer.remove();
    }, duration);
}
