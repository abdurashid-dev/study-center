<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DTM haqida ma'lumot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{$dtm->id}}</td>
                    </tr>
                    <tr>
                        <th>Dtm nomi</th>
                        <td>{{$dtm->name}}</td>
                    </tr>
                    <tr>
                        <th>Testlar soni</th>
                        <td>{{$dtm->count_tests}}</td>
                    </tr>
                    <tr>
                        <th>DTM izoh</th>
                        <td>{{$dtm->description}}</td>
                    </tr>
                    <tr>
                        <th>Guruh</th>
                        <td>{{$dtm->getGroupName($dtm->group_id)}}</td>
                    </tr>
                    <tr>
                        <th>DTM olingan sana</th>
                        <td>{{$dtm->created_at->format('d-F-Y')}}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Yopish</button>
            </div>
        </div>
    </div>
</div>
