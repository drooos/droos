<div class="edit-profile ">
    <h4>اضافة مادة دراسية</h4>
    <form action="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="level">الصف</label>
                        <select class="form-control" id="level" name="level">
                            <!-- هنا هيبقي فيه الصفوف كلها بس لما تتضاف في الداتابيز هتبقي زي الاولي كدا-->
                            <option value="1">الاول الاعدادي</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="subject">المادة</label>
                        <select class="form-control" id="subject" name="subject">
                            <!-- ديه هتبقي فيها الحاجات اللي بيدرسها المدرس مش كل المواد-->
                            <option value="1">دراسات اجتماعية</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="about"> الوصف</label>
                        <textarea class="form-control" id="about" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">اضافة المادة</button>

        </div>
    </form>
</div>