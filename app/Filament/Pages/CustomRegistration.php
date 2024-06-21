<?php

namespace App\Filament\Pages;

use App\Enums\UserType;
use App\Models\Company;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;

class CustomRegistration extends Register
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getCompanyFormcomponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    public function getCompanyFormcomponent(): Component
    {
        return TextInput::make('company_name')
            ->required()
            ->maxLength(255);
    }
    
    protected function mutateFormDataBeforeRegister(array $data): array
    {
        $company = Company::query()->create(['name' => $data['company_name']]);
        $data['company_id'] = $company->id;
        $data['type'] = UserType::ADMIN->value;

        return $data;
    }
}
