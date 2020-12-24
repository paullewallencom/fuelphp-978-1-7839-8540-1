<?php

namespace Fuel\Tasks;

class Clearcomments
{
public function run()
{
    \DB::query(
        'DELETE FROM comments WHERE status="not_published";'
    )->execute();
    return 'Rejected comments deleted.';
}
}
/* End of file tasks/clearcomments.php */
