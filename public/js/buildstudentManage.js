function editInfo(id) {
    store.commit('idEdit',id)
    $("#modalInfo").modal("show")
}
function deleteInfo(id) {
    $("#deleteButton").attr("data",id)
    $("#modalDelete").modal("show")
}