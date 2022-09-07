<?php
/**
 * @var object $paginate
 **/

use App\core\Application;

?>

<?php if ($paginate->totalPage > 1): ?>
    <div class="px-5  bg-white py-5 flex flex-col items-center sm:flex-row sm:justify-center">
    <div class="flex items-center">
        <?php if ($paginate->prevPage): ?>
            <a href="<?= Application::$app->request->getPath() ?>?page=<?= $paginate->prevPage ?>" type="button"
               class="w-full p-4 border text-base rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                    </path>
                </svg>

            </a>
        <?php endif; ?>

        <?php
        $page = 1;
        if ($paginate->page > 5) {
            $page = +$paginate->page - 4;
        }
        ?>
        <?php if ($page !== 1): ?>
            <a href="#"
               class="w-full px-4 py-2 border-t border-b
                   text-base text-gray-500 bg-white hover:bg-gray-100 ">
                ...
            </a>
        <?php endif; ?>
        <?php for (; $page <= $paginate->totalPage; $page++) : ?>
            <?php if ($paginate->page == $page): ?>
                <a href="#"
                   class="w-full px-4 py-2 border-t border-b
                       text-base  text-indigo-500
                       bg-white hover:bg-gray-100 ">
                    <?= $page ?>
                </a>
            <?php else: ?>
                <a href="?page=<?= $page ?>"
                   class="w-full px-4 py-2 border-t border-b
                       text-base text-gray-500 bg-white hover:bg-gray-100 ">
                    <?= $page ?>
                </a>
            <?php endif; ?>

            <?php if ($page == (+$paginate->page + 4)): ?>
                <a href="#"
                   class="w-full px-4 py-2 border-t border-b
                           text-base text-gray-500 bg-white hover:bg-gray-100 ">
                    ...
                </a>
                <?php break; endif; ?>

        <?php endfor; ?>

        <?php if ($paginate->page != $paginate->totalPage): ?>
            <a href="?page=<?= $paginate->totalPage ?>"
               class="w-full p-4 border-t border-b border-l text-base
                 rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                    </path>
                </svg>
            </a>
        <?php endif; ?>

    </div>
</div>
<?php endif; ?>
