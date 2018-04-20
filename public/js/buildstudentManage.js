function editInfo(id) {
    store.commit('idEdit',id)
    $("#modalInfo").modal("show")
}