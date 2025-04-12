export const initNprogress = () => {
    // initialize nprogress
    Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
    // Runs immediately before a commit's payload is sent to the server...

respond(() => {
        NProgress.done();
        NProgress.start();

    // Runs after a response is received but before it's processed...
})

succeed(({ snapshot, effect }) => {
    // Runs after a successful response is received and processed
    // with a new snapshot and list of effects...
  NProgress.done();
})

fail(() => {
    // Runs if some part of the request failed...
    NProgress.done();
})
})

  }