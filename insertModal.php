
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Data</h4>
            </div>
            <div class="modal-body" >
                <form id="insert-form" action="" method="post">
                    <label>CODE</label>
                    <input type="hidden" id="ID" name="ID" />
                    <input type="text" id="CODE" name="CODE" class="form-control" placeholder="code" maxlength="9" title="กรุณากรอกตัวเลข และ ตัวแรกเป็นเลข 0"
                        pattern="^0[0-9]{8}$" required/>
                    <label>NAME</label>
                    <input type="text" id="NAME" name="NAME" class="form-control" placeholder="Fristname Lastname" required/>
                    <label>TECHNICIAN</label>
                    <input type="text" id="TECHNICIAN" name="TECHNICIAN" class="form-control" placeholder="TECHNICIAN" maxlength="6"
                        pattern="^.{6}$" title="กรุณากรอก 6 ตัวอักษร" required/>
                    <label>CREDIT</label>
                    <input type="text" id="CREDIT" name="CREDIT" class="form-control" placeholder="1-3" maxlength="1" required/>
                    <label>GRADE</label>
                    <input type="text" id="GRADE" name="GRADE" class="form-control" maxlength="2"
                        pattern="A|B[+]|B|C[+]|C|D[+]|D|F|W" placeholder="[A, B+, B, C+, C, D+, D, F,  W ]" title="กรุณากรอก[A, B+, B, C+, C, D+, D, F,  W ]" required/>
                    <div class="modal-footer">
                        <input type="submit" value="insert" id="insert" class="btn btn-sucess">
                    </div>    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>