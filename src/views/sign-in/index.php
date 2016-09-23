<?php
/* @var $this yii\web\View */
/* @var $signInForm app\models\forms\SignInForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'サインイン';
?>

<?php
$form = ActiveForm::begin([
    'id' => 'sign-in',
    'class' => 'form-signin',
]);
?>
    <h2 class="form-signin-heading">サインインしてください</h2>

    <label for="inputEmail" class="sr-only"><?= Html::encode($signInForm->getAttributeLabel('email')) ?></label>
<?=
$form->field($signInForm, 'email')->textInput([
    'class' => 'form-control input-lg',
    'placeholder' => $signInForm->getAttributeLabel('email'),
    'autofocus' => true,
])->label(false)
?>

    <label for="inputPassword" class="sr-only"><?= Html::encode($signInForm->getAttributeLabel('password')) ?></label>
<?=
$form->field($signInForm, 'password')->passwordInput([
    'class' => 'form-control input-lg',
    'placeholder' => $signInForm->getAttributeLabel('password'),
])->label(false)
?>
    <div class="checkbox">
        <?=
        $form->field($signInForm, 'remember')->checkbox()->label(false)
        ?>
    </div>
<?=
Html::submitButton('サインイン', [
    'class' => 'btn btn-primary btn-lg btn-block',
])
?>
<hr/>
    <h2 class="form-signin-heading">もしくは新規登録</h2>
<?=
Html::a('サインアップ', 'sign-up', [
    'class' => 'btn btn-primary btn-lg btn-block',
])
?>
<?php ActiveForm::end(); ?>