<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiaryResource\Pages;
use App\Filament\Resources\BeneficiaryResource\RelationManagers;
use App\Models\Beneficiary;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Forms\Components\FileUpload;
use Livewire\TemporaryUploadedFile;

class BeneficiaryResource extends Resource
{
    protected static ?string $model = Beneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    // protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'GIP';
    protected static ?string $navigationGroup = 'Records';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('office_id')
                        ->relationship('office','name')
                        ->required()
                        ->disableLabel()
                        ->placeholder('Select Office'),
                    TextInput::make('fname')->required()->disableLabel()->placeholder('First Name'),
                    TextInput::make('lname')->required()->disableLabel()->placeholder('Last Name'),
                    Radio::make('sex')->options(['Male' => 'Male','Female' => 'Female'])->required(),
                    TextInput::make('id_number')->required()->unique(ignorable: fn ($record) => $record)->disableLabel()->placeholder('Employee ID No.'),
                    TextInput::make('assign_to')->required()->disableLabel()->placeholder('Assigned to'),
                    Radio::make('status')->required()->options(['New' => 'New (0-6 months)','Extend' => 'Extend (6-12 months)','Warning' => 'Extended (over 12 months)']),
                    DatePicker::make('date_started')->required()->disableLabel()->placeholder('Contract Started'),
                    DatePicker::make('date_end')->required()->disableLabel()->placeholder('Contract End'),
                    FileUpload::make('attachment')
                        ->acceptedFileTypes(['application/pdf'])
                        ->disableLabel()
                        ->enableOpen()
                        ->enableDownload()
                        ->removeUploadedFileButtonPosition('right')
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend('GIP - ');
                        }),
                    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('status')->label('Status of Contract')->sortable()->searchable()->limit(20)->size('sm')
                    ->colors([
                        'warning' => static fn ($state): bool => $state === 'Extend',
                        'success' => static fn ($state): bool => $state === 'New',
                        'danger' => static fn ($state): bool => $state === 'Warning',
                    ]),
                TextColumn::make('office.name')->sortable()->searchable()->limit(20)->size('sm'),
                TextColumn::make('fname')->label('First Name')->sortable()->searchable()->limit(20)->size('sm'),
                TextColumn::make('lname')->label('Last Name')->sortable()->searchable()->limit(20)->size('sm'),
                TextColumn::make('id_number')->label('ID No.')->sortable()->searchable()->wrap()->size('sm'),
                TextColumn::make('assign_to')->label('Assigned to')->sortable()->searchable()->limit(20)->size('sm'),
                TextColumn::make('date_started')->sortable()->size('sm')->label('Contract Started'),
                TextColumn::make('date_end')->sortable()->size('sm')->label('Contract End'),
                TextColumn::make('attachment')->sortable()->size('sm')->label('PDF Filename'),
                // TextColumn::make('created_at')
                //     ->label('Date added')
                //     ->dateTime()
                //     ->sortable()
                //     ->limit(20)
                //     ->wrap()
                //     ->size('sm'),
                // TextColumn::make('updated_at')
                //     ->label('Date updated')
                //     ->dateTime()
                //     ->limit(20)
                //     ->wrap()
                //     ->size('sm'),
            ])
            ->filters([
                SelectFilter::make('office')->relationship('office','name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()->exports([
                    ExcelExport::make('Table')->fromTable()->askForFilename('GIP - ' . date('Y-m-d')),
                    // ExcelExport::make('Form')->fromForm()->askForFilename('GIP - ' . date('Y-m-d')),
                ])
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeneficiaries::route('/'),
            'create' => Pages\CreateBeneficiary::route('/create'),
            // 'edit' => Pages\EditBeneficiary::route('/{record}/edit'),
        ];
    }    
}
